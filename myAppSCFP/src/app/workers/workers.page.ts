import { Component, OnInit } from '@angular/core';
import { WorkerService } from './../services/worker.service';

@Component({
  selector: 'app-workers',
  templateUrl: './workers.page.html',
  styleUrls: ['./workers.page.scss'],
})
export class WorkersPage implements OnInit {

  workers:any = [];
  wor_id_number:any = ''

  constructor(
    private workerService: WorkerService
  ) { }

  ngOnInit() {
  }

  submitForm()
  {
    alert('guardado')
  }

  

}
