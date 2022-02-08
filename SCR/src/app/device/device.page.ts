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
    const data = {
      cod_uuid: info.uuid,
      platform: info.platform,
      version: info.osVersion,
      operating: info.operatingSystem,
      model: info.model,
    }
    
    this.registerService.storeDevice(data).subscribe(res =>  {
      if(res.message === 'Success'){
        localStorage.setItem('workers_pin_list', JSON.stringify(res.worker_pin_list));
        this.router.navigateByUrl('/');
        this.presentToast('success', 'Registro de dispositivo exitoso');
      }else{
        this.presentToast('danger', 'Error. Este dispositivo se encuentra registrado o no tiene permisos para registrar');
      }
    }, err => {
      console.log(err)
      this.presentToast('danger', 'Error. Este dispositivo se encuentra registrado o no tiene permisos para registrar');
    });
  }

  async update()
  {
    this.registerService.updateWorkersPinList().subscribe(res => {
      localStorage.setItem('workers_pin_list', JSON.stringify(res));
      console.log(res)
      this.router.navigateByUrl('/');
      this.presentToast('success', 'Actualización exitoso');
    }, err => {
      console.log(err)
      this.presentToast('danger', 'Error en actualizar');
    })
  }

  async presentToast(color, message) {
    const toast = await this.toastController.create({
      message,
      position: 'bottom',
      color,
      duration: 5000,
      cssClass: 'center'
    });
    toast.present();
  }

}
