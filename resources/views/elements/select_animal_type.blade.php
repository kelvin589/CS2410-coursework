<form>
    <!-- Select does not have a value attribute. Must programatically change the value shown. -->
    @php
        function checkType($selected_type, $old_type) {
            return $selected_type==$old_type ? 'selected' : '';
        }
    @endphp
    <select name="type" id="type" onchange='this.form.submit()'>
        <option value="" selected disabled hidden>Select the animal type</option>
        <option {{ checkType('all', $type) }} value="all">All</option>
        <option {{ checkType('mammal', $type) }} value="mammal">Mammal</option>
        <option {{ checkType('bird', $type) }} value="bird">Bird</option>
        <option {{ checkType('reptile', $type) }} value="reptile">Reptile</option>
        <option {{ checkType('amphibian', $type) }} value="amphibian">Amphibian</option>
        <option {{ checkType('fish', $type) }} value="fish">Fish</option>
        <option {{ checkType('invertebrate', $type) }} value="invertebrate">Invertebrate</option>
    </select>
</form>