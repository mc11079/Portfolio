function [ change_matrix ] = change_one( matrix,num )
%UNTITLED6 Summary of this function goes here
%   Detailed explanation goes here
change=zeros(1,24);
change_matrix=zeros(4096,24);
change(:,num)=1;
for i=1:4096
change=matrix(i,:)+change;
change_matrix(i,:)=mod(change,2);
end
end

