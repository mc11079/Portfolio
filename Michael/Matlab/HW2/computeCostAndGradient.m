function [J, Gradient] = computeCostAndGradient(D, Y, Hypothesis)
%UNTITLED5 Summary of this function goes here
%   Detailed explanation goes here

[J, Gradient] = computeRegularizedCostAndGradient (D, Y, Hypothesis,0);

