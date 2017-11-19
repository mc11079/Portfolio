function [ bool,num ] = scanner( matrix,vector,start )
%UNTITLED10 Summary of this function goes here
%   Detailed explanation goes here
bool=false;
num=-1;
for i=start:24
  if isequal(vector,matrix(i,:))
      num=i;
      bool=true;
  end
end
end

