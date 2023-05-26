const port = 3000;
const app = require("./app");
const mongoose = require("mongoose");
const urlMongodb = "mongodb+srv://admin:92145475@cluster0.bmvp0my.mongodb.net/apidb";

mongoose.connect(urlMongodb,(err, res) =>{

    try{
        if(err){
            throw err;
        }
        else{
            console.log("La conexión a la base de datos es correcta");
            app.listen(port, () =>{
                console.log("Server running at http://localhost:" + port);
            })
        }

    }catch(error){
        console.log(error);
    }
})





