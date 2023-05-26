const Producto = require("../models/producto");

function holaMundo(req,res){
    console.log("hola mundo udemy");
}

async function createProducto(req,res){
    const producto = new Producto();
    const params = req.body; 

    producto.descripcion = params.descripcion;
    producto.codigo = params.codigo;
    producto.categoria = params.categoria;

    try {
        const productoLista = await producto.save();

        if (!productoLista){
            res.status(400).send({msg:"No se ha guardado el producto"});
        }
        else{
            res.status(200).send({producto: productoLista});
        }

    } catch (error) {
        res.status(500).send(error);
    }

    console.log(producto.descripcion);
}
async function getProductos(req,res){
    try {
        const productos = await Producto.find().sort({create_at:1});
        if (!productos){
            res.status(400).send({msg:"Error al obtener los productos"});
        }
        else{
            res.status(200).send({productos});
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function getProductosByCategoria(req,res){
    const params = req.query;
    const categoria = params.categoria;
    try{
        const productos = await Producto.find({categoria:categoria}).sort({create_at:1});

        if(!productos){
            res.status(400).send({msg:"Error al obtener los productos"});
        }
        else{
            res.status(200).send({productos});
        }

    }
    catch (error) {
        res.status(500).send(error);
    }
}

async function getProductosByDescripcion(req,res){
    const params = req.query;
    const descripcion = params.descripcion;

    try{
        const productos = await Producto.find({descripcion:descripcion}).sort({create_at:1});

        if(!productos){
            res.status(400).send({msg:"Error al obtener los productos"});
        }
        else{
            res.status(200).send({productos});
        }

    }
    catch (error) {
        res.status(500).send(error);
    }
}

async function updateProducto(req,res){
    const params = req.body;
    const idProducto = params.id;

    try{

        const producto = await Producto.findByIdAndUpdate(idProducto,params);

        if(!producto){
            res.status(400).send({msg:"No se ha podido actualizar el producto"});
        }
        else{
            res.status(200).send({msg:"Actualizacion completada correctamente"});
        }

    }
    catch (error){

        res.status(500).send(error);

    }

}

async function deleteProducto(req,res){
    const params = req.body;
    const idProducto = params.id;

    try{
        const producto = await Producto.findByIdAndDelete(idProducto);

        if(!producto){
            res.status(400).send({msg:"No se ha podido eliminar el producto"});
        }
        else{
            res.status(200).send({msg:"Eliminación completada correctamente"});
        }

    }
    catch (error){
        res.status(500).send(error);

    }
}

module.exports = {
    holaMundo,
    createProducto,
    getProductos,
    getProductosByCategoria,
    getProductosByDescripcion,
    updateProducto,
    deleteProducto
}