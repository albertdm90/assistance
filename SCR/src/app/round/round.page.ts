import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { Router } from '@angular/router';
import { RoundService } from './../services/round.service';
import { Plugins } from '@capacitor/core';
import { NFC, Ndef } from '@awesome-cordova-plugins/nfc/ngx';

const { Geolocation, Network, Keyboard } = Plugins;

@Component({
  selector: 'app-round',
  templateUrl: './round.page.html',
  styleUrls: ['./round.page.scss'],
})
export class RoundPage implements OnInit {

  checkpoints:any = [];
  status:any = false;
  cp_code:any = '';
  wor_pin: any = '';
  lat:string = '';
  lon:string = '';
  statusConnected:boolean = false;
  

  constructor(
    public toastController: ToastController,
    private router: Router,
    private roundService: RoundService,
    private nfc: NFC,
    private ndef: Ndef
  ) { }

  async ngOnInit() {
    let status2 = await Network.getStatus();
    this.statusConnected = status2.connected;
    this.readerNFC();
    this.status = false;
  }

  readerNFC()
  {
    let flags = this.nfc.FLAG_READER_NFC_A | this.nfc.FLAG_READER_NFC_V
    
    
    const readerMode$ = this.nfc.readerMode(flags).subscribe(
      tag => {
        console.log(this.nfc.bytesToHexString(tag.id));

        this.cp_code = this.nfc.bytesToHexString(tag.id);
        this.status = true;
        this.presentToast('warning', this.nfc.bytesToHexString(tag.id));     
        this.timeStore()
      },
      err => {
        console.log('Error reading tag', err)
        this.presentToast('danger', 'Error en el chip NFC');
        this.router.navigateByUrl('/');
      }
    );


  }

  async timeStore()
  {
    await setTimeout(() =>{
      console.log('esperando')
      this.router.navigateByUrl('/');
    }, 90000);
  }

  async submitForm(){
    let send:boolean = true;
    let rounds:any = JSON.parse(localStorage.getItem('rounds'));
    let roundsCount:any = JSON.parse(localStorage.getItem('roundsCount'));
    const workers_pin_list:any = JSON.parse(localStorage.getItem('workers_pin_list'));
    
    if(this.wor_pin ==  null || this.wor_pin ==  ''){
      send = false;
      this.presentToast('danger', 'Ingrese PIN');
    }

    // console.log(workers_pin_list)

    if(! workers_pin_list.data.includes(this.wor_pin)){
      send = false;
      this.presentToast('danger', 'PIN incorrecto');
    }


    const coordinates = await Geolocation.getCurrentPosition();
    // console.log('Current', coordinates.coords.longitude);



    if(send){
      let date = new Date();
      let year = date.getFullYear();
      let month = date.getMonth() + 1 > 9 ? date.getMonth() + 1 : `0${date.getMonth() + 1}`;
      let day = date.getDate() +1 > 9 ? date.getDate() : `0${date.getDate()}`;
      const rou_date = `${year}-${month}-${day}`;
      let hour = date.getHours() > 9 ? date.getHours() : `0${date.getHours()}`;
      let minute = date.getMinutes() > 9 ? date.getMinutes() : `0${date.getMinutes()}`;
      let second = date.getSeconds() > 9 ? date.getSeconds() : `0${date.getSeconds()}`;
      const rou_time = `${hour}:${minute}:${second}`;

      const data = {
        cp_code: this.cp_code,
        wor_pin: this.wor_pin,
        rou_date,
        rou_time,
        rou_lat: coordinates.coords.latitude,
        rou_long: coordinates.coords.longitude,
        cod_uuid: localStorage.getItem('cod_uuid'),
      }
      rounds != null ? rounds.push(data) : rounds = [data];
      localStorage.setItem('rounds', JSON.stringify(rounds));
      roundsCount = parseInt(roundsCount) + 1;
      localStorage.setItem('roundsCount', JSON.stringify(roundsCount));
      this.presentToast('success', 'Registro creado');
      this.router.navigate(['/']);
      this.cp_code = '';
      this.status = false;
      this.wor_pin = '';
      this.cp_code = '';
    }

    
  }
  async presentToast(color, message) {
    const toast = await this.toastController.create({
      message,
      position: 'bottom',
      color,
      duration: 9000,
      cssClass: 'center'
    });
    toast.present();
  }

}
