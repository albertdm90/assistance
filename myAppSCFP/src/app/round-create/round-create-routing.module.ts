import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { RoundCreatePage } from './round-create.page';

const routes: Routes = [
  {
    path: '',
    component: RoundCreatePage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class RoundCreatePageRoutingModule {}
