import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-checkpoints',
  templateUrl: './checkpoints.page.html',
  styleUrls: ['./checkpoints.page.scss'],
})
export class CheckpointsPage implements OnInit {

  constructor(
    public httpClient: HttpClient
  ) {
    
   }

  ngOnInit() {
  }

}
