package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QMateriaPadrao is a Querydsl query type for MateriaPadrao
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QMateriaPadrao extends EntityPathBase<MateriaPadrao> {

    private static final long serialVersionUID = -1948644998L;

    public static final QMateriaPadrao materiaPadrao1 = new QMateriaPadrao("materiaPadrao1");

    public final NumberPath<Long> codigoMateria = createNumber("codigoMateria", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath materiaPadrao = createString("materiaPadrao");

    public QMateriaPadrao(String variable) {
        super(MateriaPadrao.class, forVariable(variable));
    }

    public QMateriaPadrao(Path<? extends MateriaPadrao> path) {
        super(path.getType(), path.getMetadata());
    }

    public QMateriaPadrao(PathMetadata<?> metadata) {
        super(MateriaPadrao.class, metadata);
    }

}

