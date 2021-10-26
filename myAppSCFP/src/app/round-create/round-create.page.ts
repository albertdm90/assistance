import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ToastController } from '@ionic/angular';
import { RoundService } from '../services/round.service';


@Component({
  selector: 'app-round-create',
  templateUrl: './round-create.page.html',
  styleUrls: ['./round-create.page.scss'],
})
export class RoundCreatePage implements OnInit {

  cp_id: any;
  wor_id_number: any = '';
  wor_pin: any = '';
  
  constructor(
    private activatedRoute: ActivatedRoute,
    private router: Router,
    public toastController: ToastController,
    private roundService: RoundService,
  ) {  }

  
  ngOnInit(){
    this.cp_id = this.activatedRoute.snapshot.paramMap.get('id');
  }

  submitForm(){
    const data = {
      cp_id: this.cp_id,
      wor_id_number: this.wor_id_number,
      wor_pin: this.wor_pin,
    }

    this.roundService.storeRound(data).subscribe(res =>  {
      if(res.message === 'Success'){
        this.presentToast('success', 'Registro exitoso');
        this.wor_id_number = '';
        this.wor_pin = '';
        this.router.navigate(['/']);
      }else{
        this.presentToast('danger', 'Error en el PIN o el horario no concuerda');
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
