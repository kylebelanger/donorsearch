<!DOCTYPE html>
<html>

  <head>
      <meta charset="utf-8">
      <title>DonorSearch</title>
      <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    </head>

  <body>
      <h2>DonorSearch</h2>
      <p>Example for filtering non-profit organizations from <a href="https://apps.irs.gov/app/eos/forwardToPub78Download.do">IRS dataset</a>.</p>

      <hr>

      <p>Please use the options below to filter and sort the data. Currently displaying <u><span id="recordCount">0</span> records</u>.</p>

      <ul>
        <li>
            <form>
              <select onchange="queryAction(this.value, null)">
                <option value="legal_name">Organization</option>
                <option value="city_name">City</option>
                <option value="state_name">State</option>
                <option value="foundation">By type: 'Foundation'</option>
              </select>

              <input oninput="queryAction(parentElement.children[0].value, this.value)" type="text" placeholder="Filter data">
            </form>
        </li>
      </ul>

      <section id="organizations">
          <!-- parsed data -->
      </section>

  </body>

  <script src="../assets/js/actions.js">
  </script>

</html>
