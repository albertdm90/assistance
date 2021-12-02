import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators"; 
import { endpoint } from 'src/endpoint';

@Injectable({
  providedIn: 'root'
})
export class RegisterService {

  url:any = `${endpoint}/device`;
  httpOptions: any = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(
    private httpClient: HttpClient
  ) { }

  storeDevice()
  {
    const data = {
      cod_uuid: '00000'
    }
    localStorage.setItem('cod_uuid', data.cod_uuid);
    return this.httpClient.post(`${this.url}`, data, this.httpOptions)
      .pipe(map( (res:any) => {
        return res;
      })
    );
  }
}
