import { Component, OnInit } from '@angular/core';
import { RoundService } from '../services/round.service';

@Component({
  selector: 'app-checkpoints',
  templateUrl: './checkpoints.page.html',
  styleUrls: ['./checkpoints.page.scss'],
})
export class CheckpointsPage implements OnInit {

  checkpoints:any = [];
  constructor(
    // public httpClient: HttpClient
    private roundService: RoundService
  ) {
    
   }

  ngOnInit() {
    this.roundService.indexCheckPoints().subscribe(res =>  {
      this.checkpoints = res;
    });
  }
}
