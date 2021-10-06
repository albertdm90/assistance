import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { RoundCreatePageRoutingModule } from './round-create-routing.module';

import { RoundCreatePage } from './round-create.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RoundCreatePageRoutingModule
  ],
  declarations: [RoundCreatePage]
})
export class RoundCreatePageModule {}
