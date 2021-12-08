import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators"; 
import { endpoint } from 'src/endpoint';

@Injectable({
  providedIn: 'root'
})
export class RoundService {

  url:any = `${endpoint}/round`;
  id: any;
  wor_id_number: any = '';
  wor_pin: any = '';

  httpOptions: any = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(
    private httpClient: HttpClient
  ) { }

  indexCheckPoints()
  {
    return this.httpClient.get(`${endpoint}/chekpoints`).pipe(map((res:any) => {
      return res.checkpoints;
    }));
  }

  storeRound(data)
  {
    return this.httpClient.post(`${this.url}`, data, this.httpOptions)
      .pipe(map( (res:any) => {
        return res;
      }));
  }
}
