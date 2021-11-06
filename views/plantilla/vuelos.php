<?php

use app\models\Vuelo;
use app\models\CatAeropuerto;
use yii\helpers\Html;

?>
<?= $this->render("/paquete/mejor_oferta", compact('paquete')); ?>

<div class="container">
    <div class="main-card-vuelos">
        <div class="text row justify-content-md-center">
            <div class="col-md-8 text-center heading-section animate-box">
                <h3>Vuelos </h3>
                <p>Vuelos</p>
            </div>
        </div>
    </div>
</div>

<div class="body-vuelo">
    <div class="all-container">

    <div class="card">
        <div class="card-one">
            <img class="card-img" src="https://images.unsplash.com/photo-1591699396114-d936888e470f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Ephesus Picture">
            <h6 class="guided">Guided Tour</h6>
            <h2>Ephesus Full Day</h2>
            <h5>Inc Ephesus and House of Virgin Marry</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 8 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>Small Groups </span></i>
            </div>
            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 79</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-one">
            <img class="card-img" src="https://images.unsplash.com/photo-1589366025085-d060e3f956e6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Ephesus Picture">
            <h6 class="private">Private Tour</h6>
            <h2>Ephesus Half Day</h2>
            <h5>Inc Artemis and Isabey Mosque</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 6 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>Small Groups </span></i>
            </div>

            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 59</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-three">
            <img class="card-img" src="https://images.unsplash.com/photo-1491252476179-5f2566566ab8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Istanbul Picture">
            <h6 class="daytrip">Day Trip</h6>
            <h2>Golden Istanbul Tour</h2>
            <h5>Inc Blue Mosque and Hagia Sophia</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 7 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>Small Groups </span></i>
            </div>

            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 129</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-four">
            <img class="card-img" src="https://images.unsplash.com/photo-1466442929976-97f336a657be?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Istanbul Picture">
            <h6 class="guided">Guided Tour</h6>
            <h2>Istanbul Walking Tour</h2>
            <h5>Galata Tower and Grand Bazaar</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 5 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>10-12 people </span></i>
            </div>

            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 39</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-five">
            <img class="card-img" src="https://images.unsplash.com/photo-1595846415458-404defd93fb6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Istanbul Picture">
            <h6 class="allday">All Day</h6>
            <h2>Pamukkale</h2>
            <h5>Inc Hierapolis Ancient City</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 10 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>20 people </span></i>
            </div>

            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 89</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-six">
            <img class="card-img" src="https://images.unsplash.com/photo-1556994526-7408107943e0?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Pamukkale Picture">
            <h6 class="guided">Guided Tour</h6>
            <h2>Istanbul Full Day</h2>
            <h5>Inc Dolmabahce and Topkapi Palace</h5>

            <div class="icon">
                <i class="far fa-clock"> <span>Duration: 9 hr </span></i><br>
                <i class="fas fa-running"> <span>Skip the line</span></i><br>
                <i class="fas fa-user-friends"> <span>Small Groups </span></i>
            </div>

            <div class="prices">
                <span class="from">From</span>
                <span class="price"><i class="fas fa-euro-sign"></i> 159</span>
                <span class="person">per person</span>
            </div>
        </div>
    </div>
</div>
</div>