<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ECOINNOVA — Prototipo de Interfaz</title>
  
  <link rel="stylesheet" href="../css/catalogo.css"> 

</head>
<body>
  <header>
    </header>  <main class="container">
    <div class="grid grid-cols-3">
      <div class="card">
        <h3>Acceso rápido</h3>
        <p class="small">Este prototipo simula la visualización del historial, puntos y canjes. Inicia sesión (simulado).</p>
        <div style="margin-top:12px">
          <input id="inpName" class="input" placeholder="Nombre de usuario (ej: Juan)" />
          <div style="height:10px"></div>
          <button class="btn" onclick="login()">Iniciar sesión</button>
        </div><div id="userPanel" style="margin-top:14px;display:none">
      <hr style="margin:12px 0">
      <div class="center"><strong id="userName">Usuario</strong><span class="tag" id="userPoints">0 pts</span></div>
      <div class="muted" style="margin-top:8px">Historial de reciclaje y canjes disponibles</div>
      <div style="margin-top:12px">
        <button class="btn" onclick="showSection('productos')">Ver catálogo</button>
        <button style="margin-left:8px" class="btn" onclick="showSection('historial')">Historial</button>
      </div>
    </div>
  </div>

  <div class="card" id="mainCard">
    <div id="productosSection">
      <div style="display:flex;justify-content:space-between;align-items:center">
        <h3>Catálogo de productos</h3>
        <div style="display:flex;gap:8px;align-items:center">
          <select id="catFilter" class="input" style="width:220px" onchange="renderProducts()">
            <option value="all">Todas las categorías</option>
          </select>
        </div>
      </div>

      <div style="margin-top:12px;display:flex;flex-direction:column;gap:10px" id="productsList">
        </div>
    </div>

    <div id="historialSection" class="hidden">
      <h3>Historial</h3>
      <div style="display:flex;gap:12px;flex-wrap:wrap">
        <div class="card" style="width:48%">
          <h4 class="small">Reciclaje</h4>
          <div id="reciclajeList" style="max-height:240px;overflow:auto"></div>
        </div>
        <div class="card" style="width:48%">
          <h4 class="small">Canjes</h4>
          <div id="canjesList" style="max-height:240px;overflow:auto"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="card right">
    <div>
      <h4>Resumen</h4>
      <p class="hint">Puntos acumulados: <strong id="summaryPoints">0</strong></p>
      <p class="hint">Canjes realizados: <strong id="summaryExchanges">0</strong></p>
    </div>

    <div>
      <h4>Detalles del kit seleccionado</h4>
      <div id="kitDetails" class="kit small">Selecciona un kit para ver sus componentes</div>
    </div>

    <div>
      <h4>Ayuda rápida</h4>
      <p class="small">Recuerda: los puntos se registran desde los procesos de recolección. En este sistema puedes revisar tu historial y canjear los puntos disponibles.</p>
    </div>
  </div>
</div>

  </main>  <div id="modal" class="modal hidden">
    <div class="card" style="width:720px;max-width:92%">
      <div style="display:flex;justify-content:space-between;align-items:center">
        <h3 id="modalTitle">Producto</h3>
        <button class="btn" onclick="closeModal()">Cerrar</button>
      </div>
      <div id="modalBody" style="margin-top:12px"></div>
    </div>
  </div>  <script>
    // ... (El código JavaScript se mantiene igual) ...
    // Datos de ejemplo (tomados de la lista suministrada)
    const categorias = [
      {id:1,nombre:'Deportivos'},
      {id:2,nombre:'Pinturas'},
      {id:3,nombre:'Luminarias'},
      {id:4,nombre:'Ferretería'},
      {id:5,nombre:'Limpieza'},
      {id:6,nombre:'Librería'}
    ];

    const productos = [
      // Deportivos
      {id:1,cat:1,nombre:'Balón de basquet',puntos:30,es_kit:false},
      {id:2,cat:1,nombre:'Balón de fútbol',puntos:30,es_kit:false},
      {id:3,cat:1,nombre:'Balón de voleibol',puntos:30,es_kit:false},
      // Pinturas
      {id:4,cat:2,nombre:'Maxigama Galón tipo C',puntos:15,es_kit:false},
      {id:5,cat:2,nombre:'Maxigama Cuñete tipo C',puntos:35,es_kit:false},
      {id:6,cat:2,nombre:'Maxigama Alto tráfico amarillo y blanco Cuñete',puntos:75,es_kit:false},
      {id:7,cat:2,nombre:'Maxigama Alto tráfico amarillo y blanco Galón',puntos:20,es_kit:false},
      {id:8,cat:2,nombre:'Maxigama Cancha Cuñete',puntos:75,es_kit:false},
      // Luminarias
      {id:9,cat:3,nombre:'Reflector 50W',puntos:10,es_kit:false},
      {id:10,cat:3,nombre:'Reflector 100W',puntos:15,es_kit:false},
      {id:11,cat:3,nombre:'Reflector 200W',puntos:22,es_kit:false},
      {id:12,cat:3,nombre:'Bombillo 9W',puntos:5,es_kit:false},
      // Ferretería
      {id:13,cat:4,nombre:'Cemento 42.5 kg',puntos:18,es_kit:false},
      {id:14,cat:4,nombre:'Pego 10 kg',puntos:8,es_kit:false},
      {id:15,cat:4,nombre:'Kit Ferretería',puntos:40,es_kit:true},
      {id:16,cat:4,nombre:'Arena lavada 30 kg',puntos:0,es_kit:false},
      {id:17,cat:4,nombre:'Bloque 15x20x30',puntos:0,es_kit:false},
      // Limpieza
      {id:18,cat:5,nombre:'Rastrillo',puntos:15,es_kit:false},
      {id:19,cat:5,nombre:'Escoba',puntos:6,es_kit:false},
      {id:20,cat:5,nombre:'Pala plástica',puntos:8,es_kit:false},
      {id:21,cat:5,nombre:'Candado Anticizalla latón 70mm Pro Al | Zio',puntos:70,es_kit:false},
      {id:22,cat:5,nombre:'Kit Limpieza',puntos:35,es_kit:true},
      // Librería
      {id:23,cat:6,nombre:'Engrapadora',puntos:20,es_kit:false},
      {id:24,cat:6,nombre:'Caja de grapas',puntos:7,es_kit:false},
      {id:25,cat:6,nombre:'Pega blanca grande',puntos:6,es_kit:false},
      {id:26,cat:6,nombre:'Caja de tijeras',puntos:20,es_kit:false},
      {id:27,cat:6,nombre:'Paquete de teipes',puntos:15,es_kit:false},
      {id:28,cat:6,nombre:'Caja de borrador de pizarra',puntos:40,es_kit:false},
      {id:29,cat:6,nombre:'Caja de silicón',puntos:15,es_kit:false},
      {id:30,cat:6,nombre:'Caja de lápices',puntos:5,es_kit:false},
      {id:31,cat:6,nombre:'Caja de tipex',puntos:17,es_kit:false},
      {id:32,cat:6,nombre:'Caja de bolígrafos',puntos:8,es_kit:false},
      {id:33,cat:6,nombre:'Caja de tiza',puntos:5,es_kit:false},
      {id:34,cat:6,nombre:'Paquete de carpetas',puntos:25,es_kit:false},
      {id:35,cat:6,nombre:'Resma de hojas',puntos:12,es_kit:false},
      {id:36,cat:6,nombre:'Kit Higiene',puntos:15,es_kit:true},
      {id:37,cat:5,nombre:'Papel higiénico',puntos:0,es_kit:false},
      {id:38,cat:5,nombre:'Jabón',puntos:0,es_kit:false},
      {id:39,cat:5,nombre:'Alcohol',puntos:0,es_kit:false}
    ];

    const kits_detalles = [
      // Kit Ferretería -> Cemento 1, Arena 2, Bloque 12
      {kitId:15, prodId:13, qty:1},
      {kitId:15, prodId:16, qty:2},
      {kitId:15, prodId:17, qty:12},
      // Kit Limpieza -> Rastrillo, Escoba, Pala
      {kitId:22, prodId:18, qty:1},
      {kitId:22, prodId:19, qty:1},
      {kitId:22, prodId:20, qty:1},
      // Kit Higiene -> Papel higiénico, Jabón, Alcohol
      {kitId:36, prodId:37, qty:1},
      {kitId:36, prodId:38, qty:1},
      {kitId:36, prodId:39, qty:1}
    ];

    // Historiales de ejemplo
    let historial_reciclaje = [
      {id:1,user:'Sin iniciar',tipo:'Cartón',kg:12.5,puntos:25,fecha:'2025-07-28'},
      {id:2,user:'Sin iniciar',tipo:'Plástico',kg:4.2,puntos:8,fecha:'2025-07-30'}
    ];
    let historial_canje = [];

    // Estado usuario simulado
    let usuario = null;

    // Inicializar filtros
    function init(){
      const sel = document.getElementById('catFilter');
      categorias.forEach(c=>{
        const op = document.createElement('option'); op.value=c.id; op.textContent=c.nombre; sel.appendChild(op);
      });
      renderProducts();
    }

    function login(){
      const name = document.getElementById('inpName').value || 'Usuario Prueba';
      usuario = {id:1,nombre:name,puntos:33}; // ejemplo de puntos
      document.getElementById('userPanel').style.display='block';
      document.getElementById('userName').textContent = usuario.nombre;
      document.getElementById('userPoints').textContent = usuario.puntos + ' pts';
      document.getElementById('summaryPoints').textContent = usuario.puntos;
      renderProducts();
      renderHistorials();
    }

    function renderProducts(){
      const list = document.getElementById('productsList'); list.innerHTML='';
      const filter = document.getElementById('catFilter').value;
      const filtered = productos.filter(p=> filter==='all' ? true : p.cat==filter);
      filtered.forEach(p=>{
        const wrap = document.createElement('div'); wrap.className='product-card';
        const left = document.createElement('div');
        left.innerHTML = `<strong>${p.nombre}</strong><div class='small'>${categorias.find(c=>c.id===p.cat).nombre}</div>`;
        const right = document.createElement('div');
        right.innerHTML = `<div style='text-align:right'><div class='tag'>${p.puntos} pts</div><div style='height:8px'></div><button class='btn' onclick='openProduct(${p.id})'>Ver</button></div>`;
        wrap.appendChild(left); wrap.appendChild(right);
        list.appendChild(wrap);
      });
    }

    function openProduct(id){
      const p = productos.find(x=>x.id===id);
      document.getElementById('modalTitle').textContent = p.nombre;
      const body = document.getElementById('modalBody'); body.innerHTML='';
      const desc = document.createElement('div'); desc.innerHTML=`<p class='small'>Categoría: ${categorias.find(c=>c.id===p.cat).nombre}</p><p class='small'>Puntos requeridos: <strong>${p.puntos}</strong></p>`;
      body.appendChild(desc);
      if(p.es_kit){
        const comp = kits_detalles.filter(k=>k.kitId===p.id).map(k=>{
          const prod = productos.find(x=>x.id===k.prodId);
          return `<li>${k.qty} × ${prod.nombre}</li>`;
        }).join('');
        const ul = document.createElement('div'); ul.innerHTML = `<div style='margin-top:8px'><strong>Componentes del kit:</strong><ul>${comp}</ul></div>`;
        body.appendChild(ul);
      }

      const buyBtn = document.createElement('div');
      buyBtn.style.marginTop='12px';
      buyBtn.innerHTML = `<button class='btn' onclick='canjear(${p.id})'>Canjear</button>`;
      body.appendChild(buyBtn);

      document.getElementById('modal').classList.remove('hidden');
    }

    function closeModal(){ document.getElementById('modal').classList.add('hidden'); }

    function canjear(prodId){
      if(!usuario){ alert('Inicia sesión primero.'); return; }
      const p = productos.find(x=>x.id===prodId);
      if(usuario.puntos < p.puntos){ alert('No tienes suficientes puntos.'); return; }
      usuario.puntos -= p.puntos;
      historial_canje.push({id:historial_canje.length+1,user:usuario.nombre,producto:p.nombre,puntos:p.puntos,fecha:new Date().toISOString().slice(0,10)});
      document.getElementById('userPoints').textContent = usuario.puntos + ' pts';
      document.getElementById('summaryPoints').textContent = usuario.puntos;
      document.getElementById('summaryExchanges').textContent = historial_canje.length;
      renderHistorials();
      closeModal();
      alert('Canje realizado con éxito.');
    }

    function renderHistorials(){
      const rec = document.getElementById('reciclajeList'); rec.innerHTML='';
      historial_reciclaje.forEach(r=>{ rec.innerHTML += `<div class='small' style='padding:6px;border-bottom:1px dashed #eef2f7'><strong>${r.tipo}</strong> — ${r.kg} kg — ${r.puntos} pts <div class='muted'>${r.fecha}</div></div>` });
      const can = document.getElementById('canjesList'); can.innerHTML='';
      historial_canje.forEach(c=>{ can.innerHTML += `<div class='small' style='padding:6px;border-bottom:1px dashed #eef2f7'><strong>${c.producto}</strong> — ${c.puntos} pts <div class='muted'>${c.fecha}</div></div>` });
    }

    function showSection(sec){
      document.getElementById('productosSection').classList.toggle('hidden', sec!=='productos');
      document.getElementById('historialSection').classList.toggle('hidden', sec!=='historial');
    }

    init();
  </script></body>
</html>