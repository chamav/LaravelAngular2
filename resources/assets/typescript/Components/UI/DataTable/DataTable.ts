import {Component} from '@angular/core';
import {DatePipe} from "@angular/common";
import {HTTP_PROVIDERS, Http} from "@angular/http";
import {DataTableDirectives} from 'angular2-datatable/datatable';
import * as _ from 'lodash';


@Component({
    selector: 'data-table',
    templateUrl: '/templates/UIComponents.DataTable.main',
    providers: [HTTP_PROVIDERS],
    directives: [DataTableDirectives],
    pipes: [DatePipe]
})
export class DataTable {

    private data;

    constructor(private http:Http) {
        http.get("files")
            .subscribe((data)=> {
                setTimeout(()=> {
                    this.data = data.json();
                }, 1000);
            });
    }



    private sortByWordLength = (a:any) => {
        return a.name.length;
    }

    public removeItem(item: any) {
        this.data = _.filter(this.data, (elem)=>elem!=item);
        console.log("Remove: ", item.email);
    }

}