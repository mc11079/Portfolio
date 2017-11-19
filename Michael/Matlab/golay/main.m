D=loadData('golay.txt');
Binary=Create_Binary(1,4095);
send=multi(D,Binary);
reverse_matrix  = reverse(D );
change_matrix_bit_3_8_15  = change_three( send,3,8,15 );
error_matrix_bit_3_8_15  = error_bit( change_matrix_bit_3_8_15,reverse_matrix );
error_vector = check_error( reverse_matrix',error_matrix_bit_3_8_15 );

