<section class="hero is-success">
    <div class="hero-body">
        <p class="title">
        💀 Bienvenidos a Mi Blog 💀
        </p>
        <p class="subtitle">
            Lista de Entradas 📝  
        </p>
    </div>
    <div class="hero-foot">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li class="<?=service('request')->uri->getPath() == '/' ? 'is-active':'' ;?>">
                        <a href="<?=base_url(route_to('home'))?>">Inicio 🏠</a>
                    </li>
                    <li class="<?=service('request')->uri->getPath() == 'auth/registro' ? 'is-active':'' ;?>">
                        <a href="<?=base_url(route_to('register'))?>">Registro 🔏 </a>
                    </li>
                    <li class="<?=service('request')->uri->getPath() == 'auth/ingresar' ? 'is-active':'' ;?>">
                        <a href="<?=base_url(route_to('login'))?>">Ingreso 🔑 </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>