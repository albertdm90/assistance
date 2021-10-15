import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from "rxjs/operators"; 
import { endpoint } from 'src/endpoint';

@Injectable({
  providedIn: 'root'
})
export class WorkerService {
  
  url:any = `${endpoint}/workers`;

  constructor(
    private httpClient: HttpClient
  ) { }

  indexWorkers()
  {
    return this.httpClient.get(`${this.url}`).pipe(map((res:any) => {
      return res.workers;
    }));
  }
}
