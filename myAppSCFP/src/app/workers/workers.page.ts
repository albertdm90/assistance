import { Component, OnInit } from '@angular/core';
import { ToastController } from '@ionic/angular';
import { FingerprintAIO } from '@ionic-native/fingerprint-aio/ngx';
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
    private faio: FingerprintAIO,
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
        this.showFingerprintAuthDlg();
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

  public showFingerprintAuthDlg() {

    this.faio.isAvailable().then((result: any) => {
      console.log(result)

      this.faio.show({
        cancelButtonTitle: 'Cancel',
        description: "Some biometric description",
        disableBackup: true,
        title: 'Scanner Title',
        fallbackButtonTitle: 'FB Back Button',
        subtitle: 'This SubTitle'
      })
        .then((result: any) => {
          console.log(result)
          alert("Successfully Authenticated!")
        })
        .catch((error: any) => {
          console.log(error)
          alert("Match not found!")
        });

    })
      .catch((error: any) => {
        console.log(error)
      });
  }  

}
