import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: 'checkpoints',
    loadChildren: () => import('./checkpoints/checkpoints.module').then( m => m.CheckpointsPageModule)
  },
  {
    path: 'round-create/:id',
    loadChildren: () => import('./round-create/round-create.module').then( m => m.RoundCreatePageModule)
  },
  {
    path: 'workers',
    loadChildren: () => import('./workers/workers.module').then( m => m.WorkersPageModule)
  },
  {
    path: 'register-device',
    loadChildren: () => import('./register-device/register-device.module').then( m => m.RegisterDevicePageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
