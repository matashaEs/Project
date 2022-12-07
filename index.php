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

function count_rows( $tab ): array {
	$arr = array();
	for ( $i = 0; $i < count( $tab ); $i ++ ) {
		for ( $j = 0; $j < count( $tab ); $j ++ ) {
			if ( ! isset ( $arr[ $j ] ) ) {
				$arr[ $j ] = $tab[ $i ][ $j ];
			} else {
				$arr[ $j ] += $tab[ $i ][ $j ];
			}
		}
	}

	return $arr;
}

function normalize( $tab, $count_rows ): array {
	$arr = array();
	foreach ( $tab as $key => $val ) {
		foreach ( $val as $k => $v ) {
			$arr[ $key ][ $k ] = $v / $count_rows[ $k ];
		}
	}

	return $arr;
}

function get_priority( $normal ): array {
	$arr = array();
	foreach ( $normal as $key => $val ) {
		$arr[ $key ] = array_sum( $val ) / count( $val );
	}

	return $arr;
}

function get_cm( $tab, $priority ): array {
	$arr = array();
	foreach ( $tab as $key => $val ) {
		foreach ( $val as $k => $v ) {
			if ( ! isset ( $arr[ $key ] ) ) {
				$arr[ $key ] = $v * $priority[ $k ];
			} else {
				$arr[ $key ] += $v * $priority[ $k ];
			}
		}
	}
	foreach ( $arr as $key => $val ) {
		$arr[ $key ] = $val / $priority[ $key ];
	}

	return $arr;
}

function get_consistency( $cm ) {
	$arr       = array();
	$sum       = array_sum( $cm );
	$count     = count( $cm );
	$arr['ci'] = ( ( $sum / $count ) - $count ) / ( $count - 1 );
	$nRi       = array(
		1  => 0,
		2  => 0,
		3  => 0.58,
		4  => 0.9,
		5  => 1.12,
		6  => 1.24,
		7  => 1.32,
		8  => 1.41,
		9  => 1.46,
		10 => 1.49,
		11 => 1.51,
		12 => 1.48,
		13 => 1.56,
		14 => 1.57,
		15 => 1.59
	);
	$arr['ri'] = $nRi[ $count ];
	$arr['cr'] = $arr['ci'] / $arr['ri'];

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
	$priority   = get_priority( $normal ); ?>

    <h3>Priorities</h3>
    <table>
		<?php for ( $i = 0; $i < $_GET['number']; $i ++ ) { ?>
            <tr>
                <td style="padding: 5px">
					<?php echo $stack[ $i ] ?>
                </td>
                <td style="padding: 5px">
					<?php echo number_format( $priority[ $i ] * 100, 2, ',', ' ' ); ?>%
                </td>
            </tr>
		<?php } ?>
    </table>
	<?php
	$cm          = get_cm( $tab, $priority );
	$consistency = get_consistency( $cm );
	echo "<h3>Consistency CI</h3>" . $consistency['ci'];
	echo "<h3>Consistency CR</h3>" . $consistency['cr'];
} ?>
