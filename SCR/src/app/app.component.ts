import { Component } from '@angular/core';
import { RoundService } from './services/round.service';
import { Plugins } from '@capacitor/core';
import { RegisterService } from './services/register.service';

const { Network } = Plugins;

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  constructor(
    private roundService: RoundService,
    private registerService: RegisterService
  ) {}

  ngOnInit() {
    setInterval(() => {
      this.storeRound();
      this.updatePin();
    }, 9000);
    // this.storeRound();
  }


  async storeRound()
  {
    const rounds: any = JSON.parse(localStorage.getItem('rounds'));
    // localStorage.setItem('rounds', null);
    let status = await Network.getStatus();

    if(rounds != null){
      if(status.connected) {
        rounds.map(round => {
          this.roundService.storeRound(round).subscribe(res =>  {
            console.log(res);
            localStorage.setItem('rounds', null);
            localStorage.setItem('roundsCount', '0');
          });
        });
      }
    }
  }

 async updatePin ()
 {
  this.registerService.updateWorkersPinList().subscribe(res => {
    localStorage.setItem('workers_pin_list', JSON.stringify(res));
    console.log('Update PIN')
  });
 }
}
