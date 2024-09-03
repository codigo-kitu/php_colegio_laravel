import {Constantes} from "../../Util/Constantes";

class Pagination {
	
	skip;
    limit;

    constructor() {
        this.skip=0;
        this.limit=Constantes.LIMIT;
    }
}

export {Pagination};