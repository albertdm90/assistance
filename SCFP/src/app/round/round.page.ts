import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { Router } from '@angular/router';
import { RoundService } from './../services/round.service';
import { Plugins } from '@capacitor/core';

const { Geolocation } = Plugins;

@Component({
  selector: 'app-round',
  templateUrl: './round.page.html',
  styleUrls: ['./round.page.scss'],
})
export class RoundPage implements OnInit {

  checkpoints:any = [];
  status:any = false;
  cp_code:any = '';
  wor_id_number: any = '';
  wor_pin: any = '';
  lat:string = '';
  lon:string = '';

  constructor(
    public toastController: ToastController,
    private router: Router,
    private roundService: RoundService,
  ) { }

  ngOnInit() {
  }

  scaner()
  {
    this.roundService.indexCheckPoints().subscribe(res =>  {
      this.checkpoints = res;
    });
  }

  select(code)
  {
    console.log(code)
    this.cp_code = code;
    this.checkpoints = [];
    this.status = true;
  }


  async submitForm(){
    let send:boolean = true;
    let rounds:any = JSON.parse(localStorage.getItem('rounds'));
    // Geolocation.requestPermissions().then(async permission => {
    //   const coordinates = await Geolocation.getCurrentPosition();
    //   console.log(coordinates);
    // }).catch(err => {
    //   console.error(err)
    // });

    
    if(this.wor_id_number ==  null || this.wor_id_number ==  '' ){
      send = false;
      this.presentToast('danger', 'Ingrese número de identificación');
    }
    if(this.wor_pin ==  null || this.wor_pin ==  ''){
      send = false;
      this.presentToast('danger', 'Ingrese PIN');
    }

    const coordinates = await Geolocation.getCurrentPosition();
    console.log('Current', coordinates.coords.longitude);

    if(send){
      let date = new Date();
      let year = date.getFullYear();
      let month = date.getMonth() > 9 ? date.getMonth() : `0${date.getMonth()}`;
      let day = date.getDay() > 9 ? date.getDay() : `0${date.getDay()}`;
      let hour = date.getHours() > 9 ? date.getHours() : `0${date.getHours()}`;
      let minute = date.getMinutes() > 9 ? date.getMinutes() : `0${date.getMinutes()}`;
      let second = date.getSeconds() > 9 ? date.getSeconds() : `0${date.getSeconds()}`;

      const data = {
        cp_code: this.cp_code,
        wor_id_number: this.wor_id_number,
        wor_pin: this.wor_pin,
        rou_date: `${year}-${month}-${day}`,
        rou_time: `${hour}:${minute}:${second}`,
        rou_lat: coordinates.coords.latitude,
        rou_long: coordinates.coords.longitude,
        cod_uuid: localStorage.getItem('cod_uuid'),
      }

      console.log(data);
      rounds != null ? rounds.push(data) : rounds = [data];
      localStorage.setItem('rounds', JSON.stringify(rounds));
      this.presentToast('success', 'Registro creado');
      // this.router.navigate(['/']);
    }

    
  }
  async presentToast(color, message) {
    const toast = await this.toastController.create({
      message,
      position: 'top',
      color,
      duration: 2000
    });
    toast.present();
  }

}
