function [ matrix_binary ] = Create_Binary( start,final )
%UNTITLED3 Summary of this function goes here
%   Detailed explanation goes here
matrix_binary=zeros(final+1,12);
for i=start:final
    binary=de2bi(i,12);
    binary= fliplr(binary);
   matrix_binary(i+1,:)= binary;
end

end

