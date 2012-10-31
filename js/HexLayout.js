var HexLayout = function(_options) {
	var options = $.extend({
		sidelen: 10,
		rotation: 0,
		boundingOrigin: {
			x: 0,
			y: 0
		}
	}, _options);
	
	var rotationRadsQ1 = options.rotation * Math.PI/180;
	var rotationRadsQ4 = (360 - options.rotation) *  Math.PI/180;
	var rotationRadsQ3 = (180 - options.rotation) *  Math.PI/180;

	var _verticalMoveDistance = Math.sqrt(3) * options.sidelen * 0.5;
	var _verticalMoveOffsetDR = {
		x: _verticalMoveDistance * Math.sin(rotationRadsQ1),
		y: _verticalMoveDistance * Math.cos(rotationRadsQ4)
	}
	var _verticalMoveOffsetDL = {
		x: _verticalMoveDistance * Math.sin(rotationRadsQ3),
		y: _verticalMoveDistance * Math.cos(rotationRadsQ3)
	}
	
	var _horizontalMoveDistance = _options.sidelen * 1.5;
	var _horizontalMoveOffsetDR = {
		x: _horizontalMoveDistance * Math.cos(rotationRadsQ1),
		y: _horizontalMoveDistance * Math.sin(rotationRadsQ4)
	}
	var _horizontalMoveOffsetDL = {
		x: _horizontalMoveDistance * Math.cos(rotationRadsQ3),
		y: _horizontalMoveDistance * Math.sin(rotationRadsQ4)
	}
	
	var moveOffsetDR = {
		x: round(_horizontalMoveOffsetDR.x + _verticalMoveOffsetDR.x),
		y: round(_horizontalMoveOffsetDR.y + _verticalMoveOffsetDR.y)
	};
	
	var moveOffsetDL = {
		x: round(_horizontalMoveOffsetDL.x + _verticalMoveOffsetDL.x),
		y: -1 * round(_horizontalMoveOffsetDL.y + _verticalMoveOffsetDL.y)
	};
	
	function round(num) {
		return Math.floor(num);
	}
	
	return {
		position: options.boundingOrigin,
		moveDownRight: function() {
			this.position.x += moveOffsetDR.x;
			this.position.y += moveOffsetDR.y;
		},
		moveDownLeft: function() {
			this.position.x += moveOffsetDL.x;
			this.position.y += moveOffsetDL.y;
		}			
	};
}