<h1>Select your seat</h1>
<div class="containerbus">
  <!-- Squared ONE -->
  <div class="autobus">

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento1" name="check" />
          <label for="asiento1">1</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento2" name="check" />
          <label for="asiento2">2</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento3" name="check" />
          <label for="asiento3">3</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento4" name="check" />
          <label for="asiento4">4</label>
        </div>
      </div>
    </div>

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento5" name="check" />
          <label for="asiento5">5</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento6" name="check" />
          <label for="asiento6">6</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento7" name="check" />
          <label for="asiento7">7</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento8" name="check" />
          <label for="asiento8">8</label>
        </div>
      </div>
    </div>

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento9" name="check" />
          <label for="asiento9">9</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento10" name="check" />
          <label for="asiento10">10</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento11" name="check" />
          <label for="asiento11">11</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento12" name="check" />
          <label for="asiento12">12</label>
        </div>
      </div>
    </div>

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento13" name="check" />
          <label for="asiento13">13</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento14" name="check" />
          <label for="asiento14">14</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento15" name="check" />
          <label for="asiento15">15</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento16" name="check" />
          <label for="asiento16">16</label>
        </div>
      </div>
    </div>

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento17" name="check" />
          <label for="asiento17">17</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento18" name="check" />
          <label for="asiento18">18</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento19" name="check" />
          <label for="asiento19">19</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento20" name="check" />
          <label for="asiento20">20</label>
        </div>
      </div>
    </div>

    <div class="fila">
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento21" name="check" />
          <label for="asiento21">21</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento22" name="check" />
          <label for="asiento22">22</label>
        </div>
      </div>
      <div class="seccion">
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento23" name="check" />
          <label for="asiento23">23</label>
        </div>
        <div class="asiento">
          <input type="checkbox" value="None" id="asiento24" name="check" />
          <label for="asiento24">24</label>
        </div>
      </div>
    </div>
  </div>
</div>


body {
  background: #555;
  font-size: 12px;
}

h1 {
  color: #eee;
  font: 30px Arial, sans-serif;
  text-shadow: 0px 1px black;
  text-align: center;
}

input[type=checkbox] {
  visibility: hidden;
}

.containerbus {
  display: flex;
  justify-content: center;
}

.autobus {
  background: lightgray;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  width: 120px;
  height: 200px;
}

.fila {
  display: flex;
  justify-content: space-between;
}

.seccion {
  display: flex;
  width: 40%;
  justify-content: space-between;
}

.asiento {
  width: 21px;
  height: 21px;
  color: white;
  font-size: 10;
  text-align: center;
  background: #fcfff4;
  background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  margin: 5px auto;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
  position: relative;
}

.asiento label {
  cursor: pointer;
  position: absolute;
  width: 15px;
  height: 15px;
  left: 3px;
  top: 3px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 1);
  background: linear-gradient(top, #222 0%, #45484d 100%);
}

.asiento label:after {
  filter: alpha(opacity=0);
  opacity: 0;
  content: '';
  position: absolute;
  width: 15px;
  height: 15px;
  background: #00bf00;
  background: linear-gradient(top, #0895d3 0%, #0966a8 100%);
  top: 0px;
  left: 0px;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}

.asiento label:hover::after {
  filter: alpha(opacity=30);
  opacity: 0.3;
}

.asiento input[type=checkbox]:checked + label:after {
  filter: alpha(opacity=100);
  opacity: 1;
}
