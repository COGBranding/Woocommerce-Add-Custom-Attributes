<?php
//Add Input Select Fields
function woo_display_custom_fields() {
    
    //create data array
    $data = [
        "Zero" => 0,
        "One" => 1,
        "Two" => 2, 
        "Three" => 3,
        "Four" => 4,
        "Five" => 5,
        "Six" => 6,
        "Seven" => 7,
        "Eight" => 8,
        "Nine" => 9,
        "Ten" => 10
    ];

    $data_two = [
      "Zero" => 0,
      "One" => 1,
      "Two" => 2, 
      "Three" => 3,
      "Four" => 4,
      "Five" => 5,
      "Six" => 6,
      "Seven" => 7,
      "Eight" => 8,
      "Nine" => 9,
      "Ten" => 10,
      "Eleven" => 11,
      "Twelve" => 12,
      "Thirteen" => 13,
      "Fourteen" => 14,
      "Fifteen" => 15,
      "Sixteen" => 16,
      "Seventeen" => 17,
      "Eighteen" => 18,
      "Nineteen" => 19,
      "Twenty" => 20,
  ];

    //get access to global product object
    global $product;

    //check that the product is one of the meal boxes
	if ( $product->get_id() === 14851) {

    ?>
    <div id="mealboxes-form">
    <div class="mealboxes">
        <label for="mealbox-option1">Protein 1: Australian Grass-Fed Beef + Barley Grass</label>
        <select class="mealbox_dropdown" name="mealbox_option_1" id="mealbox_option_1" required>
            <option selected disabled>Choose an amount</option>
            <?php foreach ($data as $key => $value ) { ?>
            <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mealboxes">
        <label for="mealbox-option2">Protein 2: Australian Chicken + Chia Seeds</label>
        <select class="mealbox_dropdown" name="mealbox_option_2" id="mealbox_option_2" required>
            <option selected disabled>Choose an amount</option>
            <?php foreach ($data as $key => $value ) { ?>
            <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="mealboxes">
        <label for="mealbox-option3">Protein 3: Australian Wild Kangaroo + Sea Kelp</label>
        <select class="mealbox_dropdown" name="mealbox_option_3" id="mealbox_option_3" required>
            <option selected disabled>Choose an amount</option>
            <?php foreach ($data as $key => $value ) { ?>
            <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
            <?php } ?>
        </select>
    </div>
    </div>
    
    <?php
    } 

   else if ( $product->get_id() === 14911 ) {

        ?>
        <div id="mealboxes-form">
        <div class="mealboxes">
            <label for="mealbox-option1_10kg">Protein 1: Australian Grass-Fed Beef + Barley Grass</label>
            <select class="mealbox_dropdown_10kg" name="mealbox_option_1" id="mealbox_option_1_10kg" required>
                <option selected disabled>Choose an amount</option>
                <?php foreach ($data_two as $key => $value ) { ?>
                <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
                <?php } ?>
            </select>
        </div>
    
        <div class="mealboxes">
            <label for="mealbox-option2_10kg">Protein 2: Australian Chicken + Chia Seeds</label>
            <select class="mealbox_dropdown_10kg" name="mealbox_option_2" id="mealbox_option_2_10kg" required>
                <option selected disabled>Choose an amount</option>
                <?php foreach ($data_two as $key => $value ) { ?>
                <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
                <?php } ?>
            </select>
        </div>
    
        <div class="mealboxes">
            <label for="mealbox-option3_10kg">Protein 3: Australian Wild Kangaroo + Sea Kelp</label>
            <select class="mealbox_dropdown_10kg" name="mealbox_option_3" id="mealbox_option_3_10kg" required>
                <option selected disabled>Choose an amount</option>
                <?php foreach ($data_two as $key => $value ) { ?>
                <option value="<?php echo $value; ?>"><?php echo "$key" ?></option>
                <?php } ?>
            </select>
        </div>
        </div>
        
        <?php
        } 
};
add_action( 'woocommerce_before_variations_form', 'woo_display_custom_fields' );

function add_custom_meta_to_cart_item( $cart_item_data, $product_id, $variation_id ) {
    //create a variable with the selected option field
    $mealbox_option_one = filter_input( INPUT_POST, 'mealbox_option_1' );
    $mealbox_option_two = filter_input( INPUT_POST, 'mealbox_option_2' );
    $mealbox_option_three = filter_input( INPUT_POST, 'mealbox_option_3' );

    //create a new meta property on the cart_item_data
    $cart_item_data['mealbox_option_1'] = $mealbox_option_one;
    $cart_item_data['mealbox_option_2'] = $mealbox_option_two;
    $cart_item_data['mealbox_option_3'] = $mealbox_option_three;

    ?>

    <!-- console.log out the value to ensure it is saved into the cart_item_data -->
    <script>
    console.log(<?= json_encode($mealbox_option_one); ?>);
    </script>

    <script>
    console.log(<?= json_encode($mealbox_option_two); ?>);
    </script>

    <script>
    console.log(<?= json_encode($mealbox_option_three); ?>);
    </script>

    <?php

    //return the cart_item_data as this is the primary object and we are using a filter 
	return $cart_item_data;
}

add_filter( 'woocommerce_add_cart_item_data', 'add_custom_meta_to_cart_item', 10, 3 );

function display_custom_meta_cart( $item_data, $cart_item ) {
    //ensure that there is a value stored in the variable
	if ( empty( $cart_item['mealbox_option_1'] ||$cart_item['mealbox_option_2'] || $cart_item['mealbox_option_3'] ) ) {
		return $item_data;
	}

    //we add a new array onto the item_data containing our key and value from the product select field
	$item_data[] = array(
		'key'     => __( 'Protein1' ),
		'value'   => wc_clean( $cart_item['mealbox_option_1'] ),
		'display' => '',
	);

    $item_data[] = array(
		'key'     => __( 'Protein2' ),
		'value'   => wc_clean( $cart_item['mealbox_option_2'] ),
		'display' => '',
	);

    $item_data[] = array(
		'key'     => __( 'Protein3' ),
		'value'   => wc_clean( $cart_item['mealbox_option_3'] ),
		'display' => '',
	);

	return $item_data;
}

add_filter( 'woocommerce_get_item_data', 'display_custom_meta_cart', 10, 2 );

function add_custom_meta_to_order_items( $item, $cart_item_key, $values, $order ) {
	if ( empty( $values['mealbox_option_1']  || $values['mealbox_option_2'] || $values['mealbox_option_3'] ) ) {
		return;
	}

	$item->add_meta_data( __( 'Protein1' ), $values['mealbox_option_1'] );
    $item->add_meta_data( __( 'Protein2' ), $values['mealbox_option_2'] );
    $item->add_meta_data( __( 'Protein3' ), $values['mealbox_option_3'] );
}

add_action( 'woocommerce_checkout_create_order_line_item', 'add_custom_meta_to_order_items', 10, 4 );
