(self["webpackChunkionic_finger_scanner_app"] = self["webpackChunkionic_finger_scanner_app"] || []).push([["src_app_checkpoints_checkpoints_module_ts"],{

/***/ 2472:
/*!***********************************************************!*\
  !*** ./src/app/checkpoints/checkpoints-routing.module.ts ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CheckpointsPageRoutingModule": () => (/* binding */ CheckpointsPageRoutingModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ 9535);
/* harmony import */ var _checkpoints_page__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./checkpoints.page */ 2010);




const routes = [
    {
        path: '',
        component: _checkpoints_page__WEBPACK_IMPORTED_MODULE_0__.CheckpointsPage
    }
];
let CheckpointsPageRoutingModule = class CheckpointsPageRoutingModule {
};
CheckpointsPageRoutingModule = (0,tslib__WEBPACK_IMPORTED_MODULE_1__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_2__.NgModule)({
        imports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule.forChild(routes)],
        exports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule],
    })
], CheckpointsPageRoutingModule);



/***/ }),

/***/ 3033:
/*!***************************************************!*\
  !*** ./src/app/checkpoints/checkpoints.module.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CheckpointsPageModule": () => (/* binding */ CheckpointsPageModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/common */ 6274);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/forms */ 3324);
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @ionic/angular */ 4595);
/* harmony import */ var _checkpoints_routing_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./checkpoints-routing.module */ 2472);
/* harmony import */ var _checkpoints_page__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./checkpoints.page */ 2010);







let CheckpointsPageModule = class CheckpointsPageModule {
};
CheckpointsPageModule = (0,tslib__WEBPACK_IMPORTED_MODULE_2__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_3__.NgModule)({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_4__.CommonModule,
            _angular_forms__WEBPACK_IMPORTED_MODULE_5__.FormsModule,
            _ionic_angular__WEBPACK_IMPORTED_MODULE_6__.IonicModule,
            _checkpoints_routing_module__WEBPACK_IMPORTED_MODULE_0__.CheckpointsPageRoutingModule
        ],
        declarations: [_checkpoints_page__WEBPACK_IMPORTED_MODULE_1__.CheckpointsPage]
    })
], CheckpointsPageModule);



/***/ }),

/***/ 2010:
/*!*************************************************!*\
  !*** ./src/app/checkpoints/checkpoints.page.ts ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CheckpointsPage": () => (/* binding */ CheckpointsPage)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _raw_loader_checkpoints_page_html__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !raw-loader!./checkpoints.page.html */ 7885);
/* harmony import */ var _checkpoints_page_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./checkpoints.page.scss */ 4455);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _services_round_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/round.service */ 6770);





let CheckpointsPage = class CheckpointsPage {
    constructor(
    // public httpClient: HttpClient
    roundService) {
        this.roundService = roundService;
        this.checkpoints = [];
    }
    ngOnInit() {
        this.roundService.indexCheckPoints().subscribe(res => {
            this.checkpoints = res;
        });
    }
};
CheckpointsPage.ctorParameters = () => [
    { type: _services_round_service__WEBPACK_IMPORTED_MODULE_2__.RoundService }
];
CheckpointsPage = (0,tslib__WEBPACK_IMPORTED_MODULE_3__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_4__.Component)({
        selector: 'app-checkpoints',
        template: _raw_loader_checkpoints_page_html__WEBPACK_IMPORTED_MODULE_0__.default,
        styles: [_checkpoints_page_scss__WEBPACK_IMPORTED_MODULE_1__.default]
    })
], CheckpointsPage);



/***/ }),

/***/ 4455:
/*!***************************************************!*\
  !*** ./src/app/checkpoints/checkpoints.page.scss ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IiIsImZpbGUiOiJjaGVja3BvaW50cy5wYWdlLnNjc3MifQ== */");

/***/ }),

/***/ 7885:
/*!*****************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/checkpoints/checkpoints.page.html ***!
  \*****************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("<ion-header>\n  <ion-toolbar color=\"primary\">\n    <ion-buttons slot=\"start\">\n      <ion-back-button></ion-back-button>\n    </ion-buttons>\n    <ion-title>Puntos de control</ion-title>\n  </ion-toolbar>\n</ion-header>\n\n<ion-content>\n\n  <ion-list>\n    <ion-item *ngFor=\"let checkpoint of checkpoints\">\n      <ion-label>{{ checkpoint.cp_description }}</ion-label>\n      <ion-button [routerLink]=\"['/round-create', checkpoint.id]\" slot=\"end\">IR</ion-button>\n    </ion-item>\n  </ion-list>\n  \n</ion-content>\n");

/***/ })

}]);
//# sourceMappingURL=src_app_checkpoints_checkpoints_module_ts.js.map