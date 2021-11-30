import { RegisterService } from './../services/register.service';
import { ToastController } from '@ionic/angular';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-register-device',
  templateUrl: './register-device.page.html',
  styleUrls: ['./register-device.page.scss'],
})
export class RegisterDevicePage implements OnInit {

  constructor(
    public toastController: ToastController,
    private registerService: RegisterService,
  ) { }

  ngOnInit() {
  }

  submitForm()
  {
    this.registerService.storeDevice().subscribe(res =>  {
      if(res.message === 'Success'){
        this.presentToast('success', 'Registro de dispositivo exitoso');
      }else{
        this.presentToast('danger', 'Error. Este dispositivo se encuentra registrado o no tiene permisos para registrar');
      }
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
