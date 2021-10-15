import { Component, OnInit } from '@angular/core';
import { RoundService } from '../services/round.service';
import { ActivatedRoute } from '@angular/router';


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
    private roundService: RoundService
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
      console.log(res);
    });

  }

}
