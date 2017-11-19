function [ reverse_matrix ] = reverse( matrix )
%UNTITLED5 Summary of this function goes here
%   Detailed explanation goes here
reverse_matrix=zeros(size(matrix));
reverse_matrix(:,1:12)= matrix(:,13:24);
reverse_matrix(:,13:24)= matrix(:,1:12);

end

