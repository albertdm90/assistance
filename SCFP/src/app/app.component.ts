import { Component } from '@angular/core';
import { RoundService } from './services/round.service';
import { Plugins } from '@capacitor/core';

const { Network } = Plugins;

@Component({
  selector: 'app-root',
  templateUrl: 'app.component.html',
  styleUrls: ['app.component.scss'],
})
export class AppComponent {
  constructor(
    private roundService: RoundService,
  ) {}

  ngOnInit() {
    setInterval(() => {
      this.storeRound();
    }, 9000);
    // this.storeRound();
  }


  async storeRound()
  {
    const rounds: any = JSON.parse(localStorage.getItem('rounds'));
    // localStorage.setItem('rounds', null);
    let status = await Network.getStatus();

    if(rounds != null){
      rounds.map(round => {
        if(status.connected) {
          this.roundService.storeRound(round).subscribe(res =>  {
            console.log(res);
          });
        }
      });
      localStorage.setItem('rounds', null);
      localStorage.setItem('roundsCount', '0');
    }
  }
}
