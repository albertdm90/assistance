import { Component } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  cod_uuid:string = '';
  
  constructor() {}

  ngOnInit(): void{
    this.cod_uuid = localStorage.getItem('cod_uuid') != null ? localStorage.getItem('cod_uuid') : '';
  }

}
