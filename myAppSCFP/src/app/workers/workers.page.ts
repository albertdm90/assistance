import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { WorkerService } from './../services/worker.service';

@Component({
  selector: 'app-workers',
  templateUrl: './workers.page.html',
  styleUrls: ['./workers.page.scss'],
})
export class WorkersPage implements OnInit {

  workers:any = [];
  wor_id_number:any = ''

  constructor(
    public toastController: ToastController,
    private workerService: WorkerService,
  ) { }

  ngOnInit() {
  }

  submitForm()
  {
    const data = {
      wor_id_number: this.wor_id_number,
    }

    this.workerService.updateFingerprint(data).subscribe(res =>  {
      if(res.message === 'Success'){
        this.presentToast('success', 'Registro de huella exitoso');
        this.wor_id_number = '';
      }else{
        this.presentToast('danger', 'Esta huella se encuentra registrada en algún dispositivo o no se encontró el numero de identificación del empleado');
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
