const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const ProductoSchema = Schema({
    descripcion:{
        type:String,
        require: true
    },
    codigo:{
        type:String,
        require: true,
        default: ""
    },
    categoria:{
        type:String,
        require: true,
        default: ""
    },
    precio_venta:{
        type:String,
        require: true,
        default: ""
    },
    precio_may_desc:{
        type:String,
        require: true,
        default: ""
    },
    precio_may_desc:{
        type:String,
        require: true,
        default: ""
    },
    fecha_modificacion:{
        type: Date,
        require: true,
        default: Date.now
    }
    
});
module.exports = mongoose.model("Producto",ProductoSchema);  0
