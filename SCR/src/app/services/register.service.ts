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
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Access-Control-Allow-Origin': '*',
      'Access-Control-Allow-Headers': '*',
      'Accept': 'application/json, text/plain',
    })
  };

  constructor(
    private httpClient: HttpClient
  ) { }

  storeDevice(data)
  {
    localStorage.setItem('cod_uuid', data.cod_uuid);
    return this.httpClient.post(`${this.url}`, data, this.httpOptions)
      .pipe(map( (res:any) => {
        return res;
      })
    );
  }

  updateWorkersPinList(){
    const cod_uuid = localStorage.getItem('cod_uuid');
    return this.httpClient.get(`${endpoint}/workers/pin/list/${cod_uuid}`, this.httpOptions)
      .pipe(map( (res:any) => {
        return res;
      })
    );
  }
}
