import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { RegisterService } from './../services/register.service';
import { Router } from '@angular/router';
import { Plugins } from '@capacitor/core';

const { Device } = Plugins;

@Component({
  selector: 'app-device',
  templateUrl: './device.page.html',
  styleUrls: ['./device.page.scss'],
})
export class DevicePage implements OnInit {

  constructor(
    public toastController: ToastController,
    private registerService: RegisterService,
    private router: Router,
  ) { }

  ngOnInit() {
  }

  async storage()
  {
    const info = await Device.getInfo();
    this.registerService.storeDevice(info.uuid).subscribe(res =>  {
      if(res.message === 'Success'){
        this.router.navigate(['/']);
        this.presentToast('success', 'Registro de dispositivo exitoso');
      }else{
        this.presentToast('danger', 'Error. Este dispositivo se encuentra registrado o no tiene permisos para registrar');
      }
    }, err => {
      console.error(err)
    });
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
