import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators"; 
import { endpoint } from 'src/endpoint';

@Injectable({
  providedIn: 'root'
})
export class WorkerService {
  
  url:any = `${endpoint}/worker`;
  httpOptions: any = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(
    private httpClient: HttpClient
  ) { }

  indexWorkers()
  {
    return this.httpClient.get(`${this.url}`).pipe(map((res:any) => {
      return res.workers;
    }));
  }

  updateFingerprint(data)
  {
    return this.httpClient.post(`${this.url}`, data, this.httpOptions)
      .pipe(map( (res:any) => {
        return res;
      }));
  }
}
