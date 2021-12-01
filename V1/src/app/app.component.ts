import { Component } from '@angular/core';
import { RoundService } from './services/round.service';

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


  storeRound()
  {
    const rounds: any = JSON.parse(localStorage.getItem('rounds'));
    // localStorage.setItem('rounds', null);
    if(rounds != null){
      rounds.map(round => {
        if(navigator.onLine) {
          this.roundService.storeRound(round).subscribe(res =>  {
            console.log(res);
          });
        }
      });
      localStorage.setItem('rounds', null);
    }
  }
}
