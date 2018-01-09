/*
 * Copyright 2014 agwlvssainokuni
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package br.net.fireup.geduca.database;

import static com.google.common.base.CaseFormat.LOWER_CAMEL;
import static com.google.common.base.CaseFormat.UPPER_UNDERSCORE;
import static com.mysema.query.sql.ColumnMetadata.getColumnMetadata;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;

import org.joda.time.LocalDate;
import org.joda.time.LocalDateTime;
import org.joda.time.LocalTime;

import com.mysema.query.Tuple;
import com.mysema.query.sql.ColumnMetadata;
import com.mysema.query.types.Expression;
import com.mysema.query.types.Operation;
import com.mysema.query.types.Ops;
import com.mysema.query.types.Path;
import com.mysema.query.types.expr.DateExpression;
import com.mysema.query.types.expr.DateTimeExpression;
import com.mysema.query.types.expr.TimeExpression;

public class QueryDslUtil implements Serializable{

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	public static DateExpression<LocalDate> currentDate() {
		return DateExpression.currentDate(LocalDate.class);
	}

	public static TimeExpression<LocalTime> currentTime() {
		return TimeExpression.currentTime(LocalTime.class);
	}

	public static DateTimeExpression<LocalDateTime> currentTimestamp() {
		return DateTimeExpression.currentTimestamp(LocalDateTime.class);
	}

	public static String adjustSize(String value, Path<?> path) {
		if (value == null) {
			return value;
		}
		ColumnMetadata metadata = getColumnMetadata(path);
		if (metadata.getSize() < 0) {
			return value;
		} else if (value.length() <= metadata.getSize()) {
			return value;
		} else {
			return value.substring(0, metadata.getSize());
		}
	}

	public static String getExpressionLabel(Expression<?> expression) {
		if (expression instanceof Operation) {
			Operation<?> op = (Operation<?>) expression;
			if (op.getOperator() == Ops.ALIAS) {
				return ((Path<?>) op.getArg(1)).getMetadata().getName();
			}
		}
		if (expression instanceof Path) {
			return getColumnMetadata((Path<?>) expression).getName();
		}
		return null;
	}

	public static Map<String, ?> tupleToMap(Tuple tuple, Expression<?>... expressions) {
		Map<String, Object> map = new LinkedHashMap<>();
		for (Expression<?> expr : expressions) {
			String label = getExpressionLabel(expr);
			if (label != null) {
				map.put(UPPER_UNDERSCORE.to(LOWER_CAMEL, label), tuple.get(expr));
			}
		}
		return map;
	}

	public static List<Map<String, ?>> tupleToMap(List<Tuple> tupleList, Expression<?>... expressions) {
		List<Map<String, ?>> list = new ArrayList<>(tupleList.size());
		for (Tuple tuple : tupleList) {
			list.add(tupleToMap(tuple, expressions));
		}
		return list;
	}

}