<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoOcorrenciaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::insert("INSERT INTO tipo_ocorrencias VALUES "
	."(1,'Agressão/Violência',1,1,NULL,NULL),"
	."(2,'Ferimento por arma branca/arma de fogo',1,1,NULL,NULL),"
	."(3,'Mordida de animal',1,1,NULL,NULL),"
	."(4,'Picada de animais peçonhentos',1,1,NULL,NULL),"
	."(5,'Quedas',1,1,NULL,NULL),"
	."(6,'AVC/Derrame',2,3,NULL,NULL),"
	."(7,'Alergia/Reação medicamentosa',2,3,NULL,NULL),"
	."(8,'Convulsões/Epilepsia',2,3,NULL,NULL),"
	."(9,'Psiquiátricos/Tentativa de suicídio',2,3,NULL,NULL),"
	."(10,'Dor abdominal',2,3,NULL,NULL),"
	."(11,'Dor de cabeça',2,3,NULL,NULL),"
	."(12,'Dor nas costas',2,3,NULL,NULL),"
	."(13,'Dor no peito/Problemas cardíacos',2,3,NULL,NULL),"
	."(14,'Envenenamento/Overdose',2,3,NULL,NULL),"
	."(15,'Gravidez/Parto/Aborto',2,3,NULL,NULL),"
	."(16,'Problemas respiratórios',2,3,NULL,NULL),"
	."(17,'Furto/Roubo/Assalto',3,2,NULL,NULL),"
	."(18,'Homicídio',3,2,NULL,NULL),"
	."(19,'Lesão corporal',3,2,NULL,NULL),"
	."(20,'Tentativa de homicídio',3,2,NULL,NULL),"
	."(21,'Violência doméstica',3,2,NULL,NULL),"
	."(22,'Violência sexual/Estupro',3,2,NULL,NULL),"
	."(24,'Alagamento/Enchente/Enxurrada',4,1,NULL,NULL),"
	."(25,'Soterramento/Deslizamento',4,1,NULL,NULL),"
	."(26,'Incêndio em edificação',4,1,NULL,NULL),"
	."(27,'Incêndio florestal/Entulhos',4,1,NULL,NULL),"
	."(28,'Incêndio veicular',4,1,NULL,NULL),"
	."(29,'Incidente com aeronave',4,1,NULL,NULL),"
	."(30,'Pessoa desaparecida/perdida',4,1,NULL,NULL),"
	."(31,'Produtos perigosos',4,1,NULL,NULL),"
	."(32,'Resgates de animais',4,1,NULL,NULL),"
	."(33,'Salvamento em altura',4,1,NULL,NULL),"
	."(34,'Afogamentos e acidentes de mergulho',5,1,NULL,NULL),"
	."(35,'Choque elétrico',5,1,NULL,NULL),"
	."(36,'Desmaio/mal súbito',5,1,NULL,NULL),"
	."(37,'Obstrução de vias aéreas',5,1,NULL,NULL),"
	."(38,'Parada cardiorespiratória',5,1,NULL,NULL),"
	."(39,'Acidente de trânsito',1,1,NULL,NULL),"
	."(40,'Outros',6,1,NULL,NULL)");
    }

}
