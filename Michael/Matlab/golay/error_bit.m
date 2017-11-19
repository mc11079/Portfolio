function [ error_matrix ] = error_bit( send_matrix,check_matrix )
%UNTITLED7 Summary of this function goes here
%   Detailed explanation goes here
err=send_matrix*check_matrix';
error_matrix=mod(err,2);

end

