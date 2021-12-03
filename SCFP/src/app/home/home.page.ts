import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  cod_uuid:string = '';
  roundsCount:string = '';
  
  constructor() {}

  ngOnInit(): void{
    this.cod_uuid = localStorage.getItem('cod_uuid') != null ? localStorage.getItem('cod_uuid') : '';
    this.roundsCount = localStorage.getItem('roundsCount') != null ? localStorage.getItem('roundsCount') : '0';
  }

}
