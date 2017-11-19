function [ D ] = loadData(filename)
%   D Y - Output args, filename - input args
%   Load data from filename to:
%       1. matrix D (data matrix)
%       2.vecotr Y (prediction vector)
%   File name: Every row = feature vals and last num is the val we need to
%   predict. Each row holds from left to right: Cost, age, updated cost

file=load(filename);
numOfdata = size(file);
D=file(1:numOfdata(1),1:numOfdata(2));

end

