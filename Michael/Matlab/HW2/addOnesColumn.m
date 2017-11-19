function [ D ] = addOnesColumn( D )
%Adds a column of ones to the left of D matrix

numOfrows = size(D,1);
colOfOnes=ones([numOfrows,1]);

D = [colOfOnes D];

end

