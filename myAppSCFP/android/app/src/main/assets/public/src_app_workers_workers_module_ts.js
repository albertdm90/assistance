(self["webpackChunkionic_finger_scanner_app"] = self["webpackChunkionic_finger_scanner_app"] || []).push([["src_app_workers_workers_module_ts"],{

/***/ 4414:
/*!********************************************!*\
  !*** ./src/app/services/worker.service.ts ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "WorkerService": () => (/* binding */ WorkerService)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_common_http__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @angular/common/http */ 1887);
/* harmony import */ var rxjs_operators__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! rxjs/operators */ 8561);
/* harmony import */ var src_endpoint__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/endpoint */ 5518);





let WorkerService = class WorkerService {
    constructor(httpClient) {
        this.httpClient = httpClient;
        this.url = `${src_endpoint__WEBPACK_IMPORTED_MODULE_0__.endpoint}/worker`;
        this.httpOptions = {
            headers: new _angular_common_http__WEBPACK_IMPORTED_MODULE_1__.HttpHeaders({ 'Content-Type': 'application/json' })
        };
    }
    indexWorkers() {
        return this.httpClient.get(`${this.url}`).pipe((0,rxjs_operators__WEBPACK_IMPORTED_MODULE_2__.map)((res) => {
            return res.workers;
        }));
    }
    updateFingerprint(data) {
        return this.httpClient.post(`${this.url}`, data, this.httpOptions)
            .pipe((0,rxjs_operators__WEBPACK_IMPORTED_MODULE_2__.map)((res) => {
            return res;
        }));
    }
};
WorkerService.ctorParameters = () => [
    { type: _angular_common_http__WEBPACK_IMPORTED_MODULE_1__.HttpClient }
];
WorkerService = (0,tslib__WEBPACK_IMPORTED_MODULE_3__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_4__.Injectable)({
        providedIn: 'root'
    })
], WorkerService);



/***/ }),

/***/ 3183:
/*!***************************************************!*\
  !*** ./src/app/workers/workers-routing.module.ts ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "WorkersPageRoutingModule": () => (/* binding */ WorkersPageRoutingModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/router */ 9535);
/* harmony import */ var _workers_page__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./workers.page */ 7765);




const routes = [
    {
        path: '',
        component: _workers_page__WEBPACK_IMPORTED_MODULE_0__.WorkersPage
    }
];
let WorkersPageRoutingModule = class WorkersPageRoutingModule {
};
WorkersPageRoutingModule = (0,tslib__WEBPACK_IMPORTED_MODULE_1__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_2__.NgModule)({
        imports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule.forChild(routes)],
        exports: [_angular_router__WEBPACK_IMPORTED_MODULE_3__.RouterModule],
    })
], WorkersPageRoutingModule);



/***/ }),

/***/ 1753:
/*!*******************************************!*\
  !*** ./src/app/workers/workers.module.ts ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "WorkersPageModule": () => (/* binding */ WorkersPageModule)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _angular_common__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @angular/common */ 6274);
/* harmony import */ var _angular_forms__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @angular/forms */ 3324);
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @ionic/angular */ 4595);
/* harmony import */ var _workers_routing_module__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./workers-routing.module */ 3183);
/* harmony import */ var _workers_page__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./workers.page */ 7765);







let WorkersPageModule = class WorkersPageModule {
};
WorkersPageModule = (0,tslib__WEBPACK_IMPORTED_MODULE_2__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_3__.NgModule)({
        imports: [
            _angular_common__WEBPACK_IMPORTED_MODULE_4__.CommonModule,
            _angular_forms__WEBPACK_IMPORTED_MODULE_5__.FormsModule,
            _ionic_angular__WEBPACK_IMPORTED_MODULE_6__.IonicModule,
            _workers_routing_module__WEBPACK_IMPORTED_MODULE_0__.WorkersPageRoutingModule
        ],
        declarations: [_workers_page__WEBPACK_IMPORTED_MODULE_1__.WorkersPage]
    })
], WorkersPageModule);



/***/ }),

/***/ 7765:
/*!*****************************************!*\
  !*** ./src/app/workers/workers.page.ts ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "WorkersPage": () => (/* binding */ WorkersPage)
/* harmony export */ });
/* harmony import */ var tslib__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! tslib */ 1855);
/* harmony import */ var _raw_loader_workers_page_html__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !raw-loader!./workers.page.html */ 3201);
/* harmony import */ var _workers_page_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./workers.page.scss */ 3185);
/* harmony import */ var _angular_core__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @angular/core */ 2741);
/* harmony import */ var _ionic_angular__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @ionic/angular */ 4595);
/* harmony import */ var _ionic_native_fingerprint_aio_ngx__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @ionic-native/fingerprint-aio/ngx */ 5998);
/* harmony import */ var _services_worker_service__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./../services/worker.service */ 4414);







let WorkersPage = class WorkersPage {
    constructor(faio, toastController, workerService) {
        this.faio = faio;
        this.toastController = toastController;
        this.workerService = workerService;
        this.workers = [];
        this.wor_id_number = '';
    }
    ngOnInit() {
    }
    submitForm() {
        const data = {
            wor_id_number: this.wor_id_number,
        };
        this.workerService.updateFingerprint(data).subscribe(res => {
            if (res.message === 'Success') {
                this.showFingerprintAuthDlg();
                this.presentToast('success', 'Registro de huella exitoso');
                this.wor_id_number = '';
            }
            else {
                this.presentToast('danger', 'Esta huella se encuentra registrada en algún dispositivo o no se encontró el numero de identificación del empleado');
            }
        });
    }
    presentToast(color, message) {
        return (0,tslib__WEBPACK_IMPORTED_MODULE_4__.__awaiter)(this, void 0, void 0, function* () {
            const toast = yield this.toastController.create({
                message,
                position: 'top',
                color,
                duration: 2000
            });
            toast.present();
        });
    }
    showFingerprintAuthDlg() {
        this.faio.isAvailable().then((result) => {
            console.log(result);
            this.faio.show({
                cancelButtonTitle: 'Cancel',
                description: "Some biometric description",
                disableBackup: true,
                title: 'Scanner Title',
                fallbackButtonTitle: 'FB Back Button',
                subtitle: 'This SubTitle'
            })
                .then((result) => {
                console.log(result);
                alert("Successfully Authenticated!");
            })
                .catch((error) => {
                console.log(error);
                alert("Match not found!");
            });
        })
            .catch((error) => {
            console.log(error);
        });
    }
};
WorkersPage.ctorParameters = () => [
    { type: _ionic_native_fingerprint_aio_ngx__WEBPACK_IMPORTED_MODULE_2__.FingerprintAIO },
    { type: _ionic_angular__WEBPACK_IMPORTED_MODULE_5__.ToastController },
    { type: _services_worker_service__WEBPACK_IMPORTED_MODULE_3__.WorkerService }
];
WorkersPage = (0,tslib__WEBPACK_IMPORTED_MODULE_4__.__decorate)([
    (0,_angular_core__WEBPACK_IMPORTED_MODULE_6__.Component)({
        selector: 'app-workers',
        template: _raw_loader_workers_page_html__WEBPACK_IMPORTED_MODULE_0__.default,
        styles: [_workers_page_scss__WEBPACK_IMPORTED_MODULE_1__.default]
    })
], WorkersPage);



/***/ }),

/***/ 3185:
/*!*******************************************!*\
  !*** ./src/app/workers/workers.page.scss ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (".text-center {\n  text-align: center;\n}\n\n.native-input .sc-ion-input-md {\n  text-align: center;\n}\n\n.img {\n  width: 200px;\n}\n\n.footer {\n  margin-top: 80px;\n}\n\n.m-t-5 {\n  margin-top: 5px;\n}\n\n.m-t-10 {\n  margin-top: 10px;\n}\n/*# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndvcmtlcnMucGFnZS5zY3NzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBO0VBQ0Usa0JBQUE7QUFDRjs7QUFFQTtFQUNFLGtCQUFBO0FBQ0Y7O0FBRUE7RUFDRSxZQUFBO0FBQ0Y7O0FBRUE7RUFDRSxnQkFBQTtBQUNGOztBQUVBO0VBQ0UsZUFBQTtBQUNGOztBQUVBO0VBQ0UsZ0JBQUE7QUFDRiIsImZpbGUiOiJ3b3JrZXJzLnBhZ2Uuc2NzcyIsInNvdXJjZXNDb250ZW50IjpbIi50ZXh0LWNlbnRlcntcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xufVxuXG4ubmF0aXZlLWlucHV0IC5zYy1pb24taW5wdXQtbWQge1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG59XG5cbi5pbWd7XG4gIHdpZHRoOiAyMDBweDtcbn1cblxuLmZvb3RlcntcbiAgbWFyZ2luLXRvcDogODBweDtcbn1cblxuLm0tdC01e1xuICBtYXJnaW4tdG9wOiA1cHg7XG59XG5cbi5tLXQtMTB7XG4gIG1hcmdpbi10b3A6IDEwcHg7XG59Il19 */");

/***/ }),

/***/ 3201:
/*!*********************************************************************************!*\
  !*** ./node_modules/raw-loader/dist/cjs.js!./src/app/workers/workers.page.html ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("<ion-header>\n  <ion-toolbar color=\"primary\">\n    <ion-buttons slot=\"start\">\n      <ion-back-button></ion-back-button>\n    </ion-buttons>\n    <ion-title>Empleado</ion-title>\n  </ion-toolbar>\n</ion-header>\n\n<ion-content>\n<ion-row>\n  <ion-col size=\"12\" class=\"ion-align-self-center\" class=\"text-center\">\n    <img class=\"img\" src=\"https://image.flaticon.com/icons/png/512/98/98745.png\" alt=\"\">\n  </ion-col>\n  \n  <ion-col size=\"12\" class=\"m-t-5\">\n    <ion-item>\n      <ion-label position=\"floating\">Número de identificación</ion-label>\n      <ion-input [(ngModel)]=\"wor_id_number\" name=\"wor_id_number\" required></ion-input>\n    </ion-item>\n  </ion-col>\n\n  \n</ion-row>\n\n<ion-row class=\"footer\">\n  <ion-col size=\"12\">\n    <ion-button expand=\"full\" type=\"button\" color=\"primary\" ion-button (click)=\"submitForm()\">Escaner</ion-button>\n  </ion-col>\n</ion-row>\n</ion-content>\n");

/***/ })

}]);
//# sourceMappingURL=src_app_workers_workers_module_ts.js.map