<?php
function combinationUtil( $arr, $data, $start, $end, $index, $r, $count ) { ?>
    <tr>

		<?php
		if ( $index == $r ) {
			?>
            <div style="display: flex">
                <td style="border: 1px solid #dddddd;">
                    <input type="radio" name="<?= $data[0] . $data[1] ?>" value="<?= $data[0] ?>" checked>
                    <label for="<?= $data[0] . $data[1] ?>"><?= $data[0] ?></label>
                    <input type="radio" name="<?= $data[0] . $data[1] ?>" value="<?= $data[1] ?>">
                    <label for="<?= $data[0] . $data[1] ?>"><?= $data[1] ?></label>
                </td>
                <td style="border: 1px solid #dddddd;">
                    <input type="radio" name="radio<?= $data[0] . $data[1] ?>" value="1" checked>
                    <label for="radio<?= $data[0] . $data[1] ?>">1</label>
                </td>
                <td style="border: 1px solid #dddddd;">
					<?php for ( $a = 2; $a <= 9; $a ++ ) { ?>
                        <input type="radio" name="radio<?= $data[0] . $data[1] ?>" value="<?= $a ?>">
                        <label for="radio<?= $data[0] . $data[1] ?>"><?= $a ?></label>
					<?php } ?>
                </td>
            </div>

			<?php
		}
		?>
    </tr>


	<?php
	for ( $i = $start; $i <= $end && $end - $i + 1 >= $r - $index; $i ++ ) {
		$data[ $index ] = $arr[ $i ];
		combinationUtil( $arr, $data, $i + 1, $end, $index + 1, $r, $count );
	}
}

function count_rows( $tab ) {
	$arr = array();
	foreach ( $tab as $key => $val ) {
		foreach ( $val as $k => $v ) {
			$arr[ $k ] += $v;
		}
	}

	return $arr;
}

function normalize( $tab, $count_rows ) {
	$arr = array();
	foreach ( $tab as $key => $val ) {
		foreach ( $val as $k => $v ) {
			$arr[ $key ][ $k ] = $v / $count_rows[ $k ];
		}
	}

	return $arr;
}

function get_priority( $normal ) {
	$arr = array();
	foreach ( $tab as $key => $val ) {
		$arr = array_sum( $val ) / count( $val );
	}

	return $arr;
}

$tab   = array();
$b     = array();
$stack = array();

?>

<div>Input number and names (2 - 20)</div>
<form method="get">
    <input type="text" name="number">
    <input type="submit" name="setNumber"
           value="Go">
</form>
<?php

if ( isset( $_GET['setNumber'] ) ) {

	?>
    <h3>Name of Criteria</h3>
    <form method="get">

		<?php
		for ( $i = 0; $i < $_GET['number']; $i ++ ) {
			echo $i + 1
			?>
            <input type="text" name="criteria<?= $i ?>"><br>

			<?php
		}
		?>
        <input type="hidden" name="number2" value="<?= $_GET['number'] ?>">
        <input type="submit" name="setCriteria"
               value="Ok">
    </form>
	<?php
}

if ( isset( $_GET['setCriteria'] ) ) {
	?>
    <h3>List</h3>

	<?php
	for ( $x = 0; $x < $_GET['number2']; $x ++ ) {
		$stack[] = $_GET[ 'criteria' . $x ];
	}
	$data = array();
	$r    = 2;
	$n    = sizeof( $stack );
	?>
    <form method="get">
        <table>
            <tr>
                <th style="border: 1px solid #dddddd;">AHP priorities</th>
                <th style="border: 1px solid #dddddd;">Equal</th>
                <th style="border: 1px solid #dddddd;">How much more?</th>
            </tr>

			<?php
			combinationUtil( $stack, $data, 0, $n - 1, 0, $r, 0 );
			?>
        </table>
		<?php for ( $i = 0; $i < $n; $i ++ ) { ?>
            <input type="hidden" name="criteria<?= $i ?>" value="<?= $stack[ $i ] ?>">
		<?php } ?>
        <input type="hidden" name="number" value="<?= $n ?>">
        <input type="submit" name="calculate" value="Calculate">
    </form>
<?php } ?>

<?php if ( isset( $_GET['calculate'] ) ) {
	for ( $i = 0; $i < $_GET['number']; $i ++ ) {
		$stack[] = $_GET[ 'criteria' . $i ];
	}

	for ( $i = 0; $i < $_GET['number']; $i ++ ) {
		for ( $j = 0; $j < $_GET['number']; $j ++ ) {
			if ( $j == $i ) {
				$tab[ $i ][ $j ] = 1;
			} else {
				if ( ! empty( $_GET[ 'radio' . $stack[ $i ] . $stack[ $j ] ] ) ) {
					if ( $_GET[ $stack[ $i ] . $stack[ $j ] ] == $stack[ $i ] ) {
						$tab[ $i ][ $j ] = $_GET[ 'radio' . $stack[ $i ] . $stack[ $j ] ];
					} else {
						$tab[ $i ][ $j ] = 1 / $_GET[ 'radio' . $stack[ $i ] . $stack[ $j ] ];
					}
				} else {
					if ( $_GET[ $stack[ $j ] . $stack[ $i ] ] == $stack[ $j ] ) {
						$tab[ $i ][ $j ] = 1 / $_GET[ 'radio' . $stack[ $j ] . $stack[ $i ] ];
					} else {
						$tab[ $i ][ $j ] = $_GET[ 'radio' . $stack[ $j ] . $stack[ $i ] ];
					}
				}
			}
		}
	}


	?>

    <h3>Decision Matrix</h3>
    <table>
		<?php for ( $i = 0; $i < $_GET['number']; $i ++ ) { ?>
            <tr>
				<?php for ( $j = 0; $j < $_GET['number']; $j ++ ) { ?>
                    <td style="padding: 1rem">
						<?php echo number_format( $tab[ $i ][ $j ], 2, ',', ' ' ); ?>
                    </td>
				<?php } ?>
            </tr>
		<?php } ?>
    </table>

	<?php
	$count_rows = count_rows( $tab );
	$normal     = normalize( $tab, $count_rows );
	$priority   = get_priority( $normal );
    var_dump($priority);

} ?>
