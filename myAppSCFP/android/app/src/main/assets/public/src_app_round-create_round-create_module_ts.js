(self["webpackChunkionic_finger_scanner_app"] = self["webpackChunkionic_finger_scanner_app"] || []).push([["src_app_round-create_round-create_module_ts"],{

/***/ 2528:
/*!*************************************************************!*\
  !*** ./src/app/round-create/round-create-routing.module.ts ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "RoundCreatePageRoutingModule": () => (/* binding */ RoundCreatePageRoutingModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ 9535);
/* harmony import */ var _round_create_page__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./round-create.page */ 4354);




const routes = [
    {
        path: '',
        component: _round_create_page__WEBPACK_IMPORTED_MODULE_0__.RoundCreatePage
    }
];
let RoundCreatePageRoutingModule = class RoundCreatePageRoutingModule {
};
RoundCreatePageRoutingModule = (0,tslib__WEBPACK_IMPORTED_MODULE_1__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_2__.NgModule)({
        imports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule.forChild(routes)],
        exports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule],
    })
], RoundCreatePageRoutingModule);



/***/ }),

/***/ 6403:
/*!*****************************************************!*\
  !*** ./src/app/round-create/round-create.module.ts ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "RoundCreatePageModule": () => (/* binding */ RoundCreatePageModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/common */ 6274);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/forms */ 3324);
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @ionic/angular */ 4595);
/* harmony import */ var _round_create_routing_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./round-create-routing.module */ 2528);
/* harmony import */ var _round_create_page__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./round-create.page */ 4354);







let RoundCreatePageModule = class RoundCreatePageModule {
};
RoundCreatePageModule = (0,tslib__WEBPACK_IMPORTED_MODULE_2__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_3__.NgModule)({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_4__.CommonModule,
            _angular_forms__WEBPACK_IMPORTED_MODULE_5__.FormsModule,
            _ionic_angular__WEBPACK_IMPORTED_MODULE_6__.IonicModule,
            _round_create_routing_module__WEBPACK_IMPORTED_MODULE_0__.RoundCreatePageRoutingModule
        ],
        declarations: [_round_create_page__WEBPACK_IMPORTED_MODULE_1__.RoundCreatePage]
    })
], RoundCreatePageModule);



/***/ }),

/***/ 4354:
/*!***************************************************!*\
  !*** ./src/app/round-create/round-create.page.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "RoundCreatePage": () => (/* binding */ RoundCreatePage)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _raw_loader_round_create_page_html__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !raw-loader!./round-create.page.html */ 6442);
/* harmony import */ var _round_create_page_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./round-create.page.scss */ 9839);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/router */ 9535);
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ 4595);
/* harmony import */ var _services_round_service__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../services/round.service */ 6770);







let RoundCreatePage = class RoundCreatePage {
    constructor(activatedRoute, router, toastController, roundService) {
        this.activatedRoute = activatedRoute;
        this.router = router;
        this.toastController = toastController;
        this.roundService = roundService;
        this.wor_id_number = '';
        this.wor_pin = '';
    }
    ngOnInit() {
        this.cp_id = this.activatedRoute.snapshot.paramMap.get('id');
    }
    submitForm() {
        const data = {
            cp_id: this.cp_id,
            wor_id_number: this.wor_id_number,
            wor_pin: this.wor_pin,
        };
        this.roundService.storeRound(data).subscribe(res => {
            if (res.message === 'Success') {
                this.presentToast('success', 'Registro exitoso');
                this.wor_id_number = '';
                this.wor_pin = '';
                this.router.navigate(['/']);
            }
            else {
                this.presentToast('danger', 'Error en el PIN o el horario no concuerda');
            }
        });
    }
    presentToast(color, message) {
        return (0,tslib__WEBPACK_IMPORTED_MODULE_3__.__awaiter)(this, void 0, void 0, function* () {
            const toast = yield this.toastController.create({
                message,
                position: 'top',
                color,
                duration: 2000
            });
            toast.present();
        });
    }
};
RoundCreatePage.ctorParameters = () => [
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__.ActivatedRoute },
    { type: _angular_router__WEBPACK_IMPORTED_MODULE_4__.Router },
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_5__.ToastController },
    { type: _services_round_service__WEBPACK_IMPORTED_MODULE_2__.RoundService }
];
RoundCreatePage = (0,tslib__WEBPACK_IMPORTED_MODULE_3__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_6__.Component)({
        selector: 'app-round-create',
        template: _raw_loader_round_create_page_html__WEBPACK_IMPORTED_MODULE_0__.default,
        styles: [_round_create_page_scss__WEBPACK_IMPORTED_MODULE_1__.default]
    })
], RoundCreatePage);



/***/ }),

/***/ 9839:
/*!*****************************************************!*\
  !*** ./src/app/round-create/round-create.page.scss ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (".text-center {\n  text-align: center;\n}\n\n.native-input .sc-ion-input-md {\n  text-align: center;\n}\n\n.img {\n  width: 200px;\n}\n\n.footer {\n  margin-top: 80px;\n}\n\n.m-t-5 {\n  margin-top: 5px;\n}\n\n.m-t-10 {\n  margin-top: 10px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbInJvdW5kLWNyZWF0ZS5wYWdlLnNjc3MiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFDRSxrQkFBQTtBQUNGOztBQUVBO0VBQ0Usa0JBQUE7QUFDRjs7QUFFQTtFQUNFLFlBQUE7QUFDRjs7QUFFQTtFQUNFLGdCQUFBO0FBQ0Y7O0FBRUE7RUFDRSxlQUFBO0FBQ0Y7O0FBRUE7RUFDRSxnQkFBQTtBQUNGIiwiZmlsZSI6InJvdW5kLWNyZWF0ZS5wYWdlLnNjc3MiLCJzb3VyY2VzQ29udGVudCI6WyIudGV4dC1jZW50ZXJ7XG4gIHRleHQtYWxpZ246IGNlbnRlcjtcbn1cblxuLm5hdGl2ZS1pbnB1dCAuc2MtaW9uLWlucHV0LW1kIHtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xufVxuXG4uaW1ne1xuICB3aWR0aDogMjAwcHg7XG59XG5cbi5mb290ZXJ7XG4gIG1hcmdpbi10b3A6IDgwcHg7XG59XG5cbi5tLXQtNXtcbiAgbWFyZ2luLXRvcDogNXB4O1xufVxuXG4ubS10LTEwe1xuICBtYXJnaW4tdG9wOiAxMHB4O1xufSJdfQ== */");

/***/ }),

/***/ 6442:
/*!*******************************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/round-create/round-create.page.html ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("<ion-header>\n  <ion-toolbar color=\"primary\">\n    <ion-buttons slot=\"start\">\n      <ion-back-button></ion-back-button>\n    </ion-buttons>\n    <ion-title>Registrar visita</ion-title>\n  </ion-toolbar>\n</ion-header>\n\n<ion-content>\n\n<form>\n  <ion-grid>\n    <ion-row>\n      <ion-col size=\"12\" class=\"ion-align-self-center\" class=\"text-center\">\n        <img class=\"img\" src=\"https://www.abraxascs.com/web/wp-content/uploads/2019/05/vigilancia_tauro_seguridad.png\" alt=\"\">\n      </ion-col>\n      \n      <ion-col size=\"12\" class=\"m-t-5\">\n        <ion-item>\n          <ion-label position=\"floating\">Número de identificación</ion-label>\n          <ion-input [(ngModel)]=\"wor_id_number\" name=\"wor_id_number\" required></ion-input>\n        </ion-item>\n        <!-- <ion-input  placeholder=\"Ingrese su número de identificación\" class=\"text-center\"></ion-input> -->\n      </ion-col>\n      <ion-col size=\"12\" class=\"m-t-5\">\n        <ion-item>\n          <ion-label position=\"floating\">PIN</ion-label>\n          <ion-input type=\"password\" pattern=\"[0-9]*\" [(ngModel)]=\"wor_pin\" name=\"wor_pin\"></ion-input>\n        </ion-item>\n        <!-- <ion-input type=\"password\" class=\"text-center\" placeholder=\"Ingrese su pin\"></ion-input> -->\n      </ion-col>\n      \n    </ion-row>\n    <ion-row class=\"footer\">\n      <ion-col size=\"6\">\n        <ion-button expand=\"full\" type=\"reset\" color=\"light\" required>Limpiar</ion-button>\n      </ion-col>\n      <ion-col size=\"6\">\n        <ion-button expand=\"full\" type=\"button\" color=\"primary\" ion-button (click)=\"submitForm()\">Enviar</ion-button>\n      </ion-col>\n    </ion-row>\n  </ion-grid>\n</form>\n\n\n</ion-content>\n");

/***/ })

}]);
//# sourceMappingURL=src_app_round-create_round-create_module_ts.js.map